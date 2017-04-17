<?php
/** Created by User: azder on Date: 07/04/2017 */

namespace Azder\R;


class ListResult extends Res implements Data
{

    public static function empty(): Result
    {
        return new static( [] );
    }

    public static function of( $value ): Result
    {
        $args = func_get_args();
        return count( $args ) ? new static( $args ) : static::empty();
    }

    public function map( callable $transformer ): Result
    {
        return static::of( ...array_map( $transformer, $this->value ) );
    }

    public function bimap( callable $etransformer, callable $transformer ): Result
    {
        return new static( array_map( $transformer, $this->value ) );
    }

    public function chain( callable $transformer ): Result
    {
        $mapped = array_map( $transformer, $this->value );
        return new static( array_merge( [], ...$mapped ) );
    }

}
