<?php

namespace App\Http\Controllers;

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
    public function generate()
    {
        $qrCode = new QrCode('Conteúdo que você deseja codificar no QR code');

        $renderer = new ImageRenderer(
            new ImagickImageBackEnd()
        );

        $writer = new Writer($renderer);
        $imageData = $writer->writeString($qrCode);

        return Response::make($imageData, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="qrcode.png"'
        ]);
    }
}