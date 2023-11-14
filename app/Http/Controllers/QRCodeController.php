<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Writer;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Facades\Response;

class QRCodeController extends Controller
{
    public function wsd()
    {
        return 'Atualização concluída.';

}
