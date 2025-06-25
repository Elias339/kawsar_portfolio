<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    public function handleFileUpdate(Request $request, $field, $model = null, $folder = null)
    {
        if ($request->hasFile($field)) {
            if ($model && $model->$field) {
                Storage::disk('public')->delete(str_replace('storage/', '', $model->$field));
            }
            $file = $request->file($field);
            $fileName = time() . '_' . $file->getClientOriginalName();

            $directory = $folder ?? $field;

           return $file->storeAs($directory, $fileName, 'public');
        }

        return $model->$field ?? null;
    }

    public function handleFileStore(Request $request, $field, $folder = null)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $fileName = time() . '_' . $file->getClientOriginalName();

            $directory = $folder ?? $field;

            return $file->storeAs($directory, $fileName, 'public');
        }

        return null;
    }



}
