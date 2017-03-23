<?php
/** Created by User: azder on Date: 21/03/2017 */

namespace Azder\R;


class DataResult extends AbstractResult implements Data
{

    public function map( callable $transformer ): Result
    {
        return new static( $transformer( $this->value ) );
    }

    public function bimap( callable $etransformer, callable $transformer ): Result
    {
        return new static( $transformer( $this->value ) );
    }

    public function ap( Result $result ): Result
    {
        return $this->chain( function ( $f ) use ( $result )
        {
            return $result->map( $f );
        } );
    }

    public function chain( callable $transformer ): Result
    {
        return $transformer( $this->value );
    }

}