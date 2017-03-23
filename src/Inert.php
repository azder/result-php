<?php
/** Created by User: azder on Date: 22/03/2017 */

namespace Azder\R;


trait Inert
{

    public function map( callable $transformer ): Result
    {
        /** @var Result $this */
        return $this;
    }

    public function bimap( callable $etransformer, callable $transformer ): Result
    {
        /** @var Result $this */
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return new static( $etransformer( $this->value ) );
    }

    public function ap( Result $result ): Result
    {
        return $result;
    }

    public function chain( callable $transformer ): Result
    {
        /** @var Result $this */
        return $this;
    }

}