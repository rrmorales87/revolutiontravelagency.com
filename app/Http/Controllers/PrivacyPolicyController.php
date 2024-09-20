<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\File;
use League\CommonMark\CommonMarkConverter;

class PrivacyPolicyController extends Controller
{

       /**
     * Show Home page
     * @return Response
     */
    public function index(): Response
    {
        $locale = app()->getLocale();
        // Ruta del archivo Markdown
        $filePath = resource_path('markdown/policy.'.$locale.'.md');
    
        // Leer el contenido del archivo Markdown
        $markdownContent = File::get($filePath);
    
        // Convertir Markdown a HTML usando CommonMark
        $converter = new CommonMarkConverter();
        $htmlContent = $converter->convertToHtml($markdownContent);
    
       return Inertia::render('TermsOfService', ['term'=>$htmlContent->getContent()]);      
    }
    
 
}
