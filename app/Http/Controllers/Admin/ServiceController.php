<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Url;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $limit = 10) {
        $input = $request->all();

        $query = Service::where('id', '>', 0);

        if ($request->get('name')) {
            $query = $query->where('name', 'like', '%' . $request->get('name') . '%');
        }

        if ($request->get('ordering')) {
            $query = $query->orderBy('ordering', $request->get('ordering'));
        } else {
            $query = $query->orderBy('ordering', "ASC");
        }
        $data = $query->paginate($limit)->withQueryString();

        return view('admin.service.index', compact('data', 'input'));
    }

    public function create() {
        return view('admin.service.create');
    }

    public function store(Request $request) {
        $input = $request->all();
        try {
            $url['module'] = 'Service';
            $url['alias'] = $input['alias'];
            Url::create($url);
            Service::create($input);

            return redirect()->route('admin.services.index')->with('success','Thêm mới dịch vụ thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.services.index')->with('error','Thêm mới dich vụ không thành công');
        }
    }

    public function edit($id) {
        $service = Service::find($id);

        if ($service) {
            return view('admin.service.create', compact('service'));
        }

        return redirect()->route('admin.services.index')->with('error','Dịch vụ không tồn tại');
    }

    public function update(Request $request, $id) {
        $service = Service::find($id);
        $input = $request->all();
        if ($service) {
            try {
                if($service->alias != $input['alias']){
                    Url::where('alias',$service->alias)->update(['alias'=>$input['alias']]);
                }
                $service->update($input);
                return redirect()->route('admin.services.index')->with('success','Dịch vụ cập nhật thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.services.index')->with('error','Dich vụ cập nhật không thành công');
            }
        }
        return redirect()->route('admin.services.index')->with('error','Dịch vụ không tồn tại');
    }

    public function destroy($id) {
        $service = Service::find($id);
        Url::where('alias',$service->alias)->delete();
        if ($service) {
            try {
                $service->delete();

                return redirect()->route('admin.services.index')->with('success','Xoá dịch vụ cập nhật thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.services.index')->with('error','Xoá dich vụ cập nhật không thành công');
            }
        }
        return redirect()->route('admin.services.index')->with('error','Dịch vụ không tồn tại');
    }
}
