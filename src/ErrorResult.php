<?php
/** Created by User: azder on Date: 21/03/2017 */

namespace Azder\R;


class ErrorResult extends AbstractResult implements Result
{


    public function map( callable $transformer ): Result
    {
        return $this;
    }

    public function bimap( callable $errorMapper, callable $dataMapper ): Result
    {
        return new self( $errorMapper( $this->value ) );
    }

    public function ap( Result $result ): Result
    {
        return $result;
    }

    public function chain( callable $transformer ): Result
    {
        return $this;
    }
}