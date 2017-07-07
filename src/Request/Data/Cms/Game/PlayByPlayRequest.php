<?php

namespace JasonRoman\NbaApi\Request\Data\Cms\Game;

use Symfony\Component\Validator\Constraints as Assert;
use JasonRoman\NbaApi\Constraints as ApiAssert;
use JasonRoman\NbaApi\Params\Data\GameDateParam;
use JasonRoman\NbaApi\Params\GameIdParam;
use JasonRoman\NbaApi\Request\AbstractDataRequest;

/**
 * Get the play-by-play for a specific period of a game used by the CMS. Valid from 2012-2013 preseason and later.
 */
class PlayByPlayRequest extends AbstractDataRequest
{
    const ENDPOINT = '/json/cms/noseason/game/{gameDate}/{gameId}/pbp_{period}.json';

    /**
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Range(min = GameDateParam::START_DATE_PRE_SEASON_2012)
     *
     * @var \DateTime
     */
    public $gameDate;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ApiAssert\ApiRegex(pattern = GameIdParam::FORMAT)
     *
     * @var string
     */
    public $gameId;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\Range(min = 1)
     *
     * @var int
     */
    public $period;
}