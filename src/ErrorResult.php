<?php
/** Created by User: azder on Date: 21/03/2017 */

namespace Azder\R;


class ErrorResult extends AbstractResult implements Result
{
    use Inert;

    public function bimap( callable $etransformer, callable $transformer ): Result
    {
        return new static( $etransformer( $this->value ) );
    }

}