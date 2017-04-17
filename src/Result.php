<?php
/** Created by User: azder on Date: 21/03/2017 */

namespace Azder\R;


interface Result
{

    //private function __construct( $value );

    public static function of( $value ): Result;

    public function chain( callable $transformer ): Result;

    public function bimap( callable $etransformer, callable $transformer ): Result;

    public function value();

    public function map( callable $transformer ): Result;

    public function ap( Result $result ): Result;


}