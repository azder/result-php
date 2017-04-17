<?php
/** Created by User: azder on Date: 21/03/2017 */

namespace Azder\R;


class ErrorResult extends Res implements Result
{

    public static function of( $value ): Result
    {
        return new static( $value );
    }

    public function bimap( callable $etransformer, callable $transformer ): Result
    {
        return static::of( $etransformer( $this->value ) );
    }

    public function chain( callable $transformer ): Result
    {
        return $this;
    }

}