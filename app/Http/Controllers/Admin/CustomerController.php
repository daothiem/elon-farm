<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Traits\HandleFile;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class CustomerController extends Controller
{
    use HandleFile;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $limit = 10) {
        $input = $request->all();
        $query = Customer::where('id', '>', 0);

        if ($request->get('name')) {
            $query = $query->where('name', 'like', '%' . $request->get('name') . '%');
        }

        if ($request->get('ordering')) {
            $query = $query->orderBy('ordering', $request->get('ordering'));
        } else {
            $query = $query->orderBy('ordering', "ASC");
        }
        $data = $query->paginate($limit)->withQueryString();


        return view('admin.customer.index', compact('data', 'input'));
    }

    public function create() {
        return view('admin.customer.create');
    }

    public function store(Request $request) {
        $input = $request->all();
        $thumbnailPath =public_path('/images/verification-img.png');
        if ($request->has('thumbnail')) {
            $response = $this->uploadAndConvertImage($request->file('thumbnail'), '/images/customers');
            $thumbnailPath = $response->getData()->path;
        }

        $input['image'] = $thumbnailPath;
        try {
            Customer::create($input);

            return redirect()->route('admin.customers.index')->with('success','Thêm mới khách hàng thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.customers.index')->with('error','Thêm mới khách hàng không thành công');

        }
    }

    public function edit($id) {
        $customer = Customer::find($id);
        return view('admin.customer.create', compact('customer'));
    }

    public function update(Request $request, $id) {
        $input = $request->all();
        $customer = Customer::find($id);
        if ($customer) {
            $input['image'] = $customer->image;
            if ($request->has('thumbnail')) {
                $this->deleteFile($customer->image);
                $thumbnail = $request->file('thumbnail');
                $responsiveAvatar = $this->uploadAndConvertImage($thumbnail, '/images/customers');
                $input['image'] = $responsiveAvatar->getData()->path;
            }

            try {
                $customer->update($input);
                return redirect()->route('admin.customers.index')->with('success','Cập nhật khách hàng thành công');
            } catch (\Exception $e) {
                return redirect()->route('admin.customers.index')->with('error','Cập nhật khách hàng không thành công');
            }
        }

        return redirect()->route('admin.customers.index')->with('error','Cập nhật khách hàng không thành công');
    }

    public function destroy($id) {
        $customer = Customer::find($id);
        try {
            $this->deleteFile($customer->image);
            $customer->delete();
            return redirect()->route('admin.customers.index')->with('success','Xoá khách hàng thành công');
        } catch (\Exception $e) {
            return redirect()->route('admin.customers.index')->with('error','Xoá khách hàng không thành công');
        }
    }
}
