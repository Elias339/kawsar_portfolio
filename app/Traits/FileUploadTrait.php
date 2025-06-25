<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    public function handleFileUpload(Request $request, $field, $model = null)
    {
        if ($request->hasFile($field)) {
            if ($model && $model->$field) {
                Storage::disk('public')->delete(str_replace('storage/', '', $model->$field));
            }

            $file = $request->file($field);
            $fileName = time() . '_' . $file->getClientOriginalName();
            return $file->storeAs($field, $fileName, 'public');
        }

        return $model->$field ?? null;
    }
}
