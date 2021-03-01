<?php

namespace App\Twig;

use RicardoFiorani\Exception\ServiceNotAvailableException;
use RicardoFiorani\Matcher\VideoServiceMatcher;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class YoutubeExtension extends AbstractExtension
{
    private $youtubeParser;

    public function __construct()
    {
        $this->youtubeParser = new VideoServiceMatcher();
    }

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('youtube_thumbnail', [$this, 'youtubeThumbnail']),
            new TwigFilter('youtube_player', [$this, 'youtubePlayer']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [$this, 'doSomething']),
        ];
    }

    public function youtubeThumbnail($value): string
    {
        try {
            $video = $this->youtubeParser->parse($value);
            return $video->getLargestThumbnail();

        } catch (ServiceNotAvailableException $e) {
            return "Video non trouvée";
        }
    }

    public function youtubePlayer($value): string
    {
        try {
            $video = $this->youtubeParser->parse($value);
            return $video->getEmbedCode('100%',600,true,true);

        } catch (ServiceNotAvailableException $e) {
            return "Video non trouvée";
        }
    }
}
