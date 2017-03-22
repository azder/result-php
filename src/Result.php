<?php
/** Created by User: azder on Date: 21/03/2017 */

namespace Azder\R;


interface Result
{

    public function __construct( $value );

    public function value();

    public function map( callable $transformer ): Result;

    public function bimap( callable $errorMapper, callable $dataMapper ): Result;

    public function ap( Result $result ): Result;

    public function chain( callable $transformer ): Result;

    public static function of( $value ): Result;


}