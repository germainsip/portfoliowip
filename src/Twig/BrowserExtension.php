<?php

namespace App\Twig;

use App\Entity\Depo;
use Spatie\Browsershot\Browsershot;
use Spatie\Image\Manipulations;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class BrowserExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('shot', [$this, 'urlThumbnail']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [$this, 'doSomething']),
        ];
    }

    public function urlThumbnail(Depo $value): string
    {
        // on vérifie que le fichier existe
        if (file_exists("img/".$value->getName().".png")){
            // s'il existe on regarde s'il a moins de 2 jours sinon on le rafraîchie
            return (time()-filemtime("img/".$value->getName().".png") <= 2 * 3600)?"img/".$value->getName().".png":createImg($value);
        } else {

            return createImg($value);
        }

    }

}

function createImg(Depo $value): string
{
    $image = Browsershot::url($value->getUrl())
        ->windowSize(1920, 1080)
        ->fit(Manipulations::FIT_CONTAIN, 300, 300)
        ->save("img/".$value->getName().".png");
    return "img/".$value->getName().".png";

}
