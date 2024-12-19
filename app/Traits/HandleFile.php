<?php
namespace App\Traits;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait HandleFile
{
    public function uploadAndConvertImage($file,string $folder): \Illuminate\Http\JsonResponse
    {
        // Đường dẫn lưu ảnh
        $thumbnailPath = public_path($folder);

        /*// Validate file upload
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048', // Max 2MB
        ]);*/

        // Lấy file upload

        if ($file) {
            // Tạo tên file mới với đuôi .webp
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Str::uuid() . '.' .$filename . '.webp';

            // Đảm bảo thư mục tồn tại
            if (!file_exists($thumbnailPath)) {
                mkdir($thumbnailPath, 0755, true);
            }

            // Chuyển đổi file sang webp và lưu
            Image::make($file)
                ->encode('webp', 90)
                ->save($thumbnailPath . '/' . $newFilename);


            // Trả về đường dẫn file đã lưu
            return response()->json([
                'success' => true,
                'message' => 'Image uploaded and converted successfully.',
                'path' => $folder .'/' . $newFilename,
            ]);
        }

        // Nếu không có file
        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.',
        ], 400);
    }

    public function checkFileExist(string $pathFile): bool
    {
        return File::exists(public_path($pathFile));
    }

    public function deleteFile(string $pathFile): void
    {
        if ($this->checkFileExist($pathFile)) {
            File::delete(public_path($pathFile));
        }
    }
}
