<?php 

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




// upload Image from disk 

   function uploadImage($request,$name,$title)
    {
        if(!$request->hasFile($name)){
            return;
        }

        $file = $request->file($name);
        $path = $file->store($title, [
            'disk' => 'uploads'
        ]);

        return $path;
    }

    // store_languages
    function storeLanguage(array $prefixes, array $requestData)
{
    $supportedLanguages = LaravelLocalization::getSupportedLocales();
    $data = [];

    foreach ($supportedLanguages as $localeCode => $properties) {
        foreach ($prefixes as $prefix) {
            $fieldName = $prefix . '_' . $localeCode;

            $data[$localeCode][$prefix] = $requestData[$fieldName] ?? null;
        }
    }

    return $data;
}


function getRulesForLanguage(array $prfixs, array $fildtypes ){

    $supportedLanguages = LaravelLocalization::getSupportedLocales();
    $rules = [];

    foreach ($supportedLanguages as $localeCode => $properties) {
        foreach ($prfixs as $prfix) {
            foreach ($fildtypes as $fildtype) {
                $rules[$prfix . '_' . $localeCode] = 'required|' . $fildtype;
            }
        }
    }

    return $rules;
}

