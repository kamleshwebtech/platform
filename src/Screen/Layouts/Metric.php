<?php

declare(strict_types=1);

namespace Orchid\Screen\Layouts;

use Orchid\Screen\Repository;

/**
 * Class Metric.
 */
abstract class Metric extends Base
{
    /**
     * @var string
     */
    public $template = 'platform::container.layouts.metric';

    /**
     * @var string
     */
    public $title = 'Example Metric';

    /**
     * @var array
     */
    public $labels = [];

    /**
     * @var array
     */
    public $data = [];

    /**
     * @var string
     */
    protected $keyValue = 'value';

    /**
     * @var string
     */
    protected $keyDiff = 'diff';

    /**
     * @param \Orchid\Screen\Repository $query
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function build(Repository $query)
    {
        $data = $query->getContent($this->data, []);
        $metrics = array_combine($this->labels, $data);

        return view($this->template, [
            'title'    => __($this->title),
            'metrics'  => $metrics,
            'keyValue' => $this->keyValue,
            'keyDiff'  => $this->keyDiff,
        ]);
    }
}
