<?php
/** Created by User: azder on Date: 21/03/2017 */

namespace Azder\R;


class DataResult extends Res implements Data
{

    public static function of( $value ): Result
    {
        return new static( $value );
    }

    public function map( callable $transformer ): Result
    {
        return static::of( $transformer( $this->value ) );
    }

    public function bimap( callable $etransformer, callable $transformer ): Result
    {
        return static::of( $transformer( $this->value ) );
    }

    public function chain( callable $transformer ): Result
    {
        return $transformer( $this->value );
    }

}