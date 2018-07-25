<?php
declare(strict_types=1);

namespace MarcVanDuivenvoorde\Range;

use Iterator;

class Range implements Iterator {
  protected $index = 0;

  /**
   * The range.
   *
   * @var array
   */
  protected $range;

  public function __construct(int $start, int $end, int $step = 1) {
    $this->range = range($start, $end, $step);
  }

  /**
   * {@inheritdoc}
   */
  public function current() {
    return $this->range($this->index);
  }

  /**
   * {@inheritdoc}
   */
  public function next() {
    return $this->index++;
  }

  /**
   * {@inheritdoc}
   */
  public function key() {
    return $this->index;
  }

  /**
   * {@inheritdoc}
   */
  public function valid() {
    return isset($this->range[$this->index]);
  }

  /**
   * {@inheritdoc}
   */
  public function rewind() {
    $this->index = 0;
  }

  /**
   * {@inheritdoc}
   */
  public function toArray() {
    return $this->range;
  }

  /**
   * Is the number available in the range.
   *
   * @param int $number
   *   The number to match.
   *
   * @return bool
   *   The number is available in the range.
   */
  public function isInRange(int $number) {
    return in_array($number, $this->range);
  }

}
