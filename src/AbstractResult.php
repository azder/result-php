<?php
/** Created by User: azder on Date: 21/03/2017 */

namespace Azder\R;


abstract class AbstractResult implements Result
{

    protected $value;

    public function __construct( $value )
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    abstract public function map( callable $transformer ): Result;

    abstract public function bimap( callable $etransformer, callable $transformer ): Result;

    abstract public function ap( Result $result ): Result;

    abstract public function chain( callable $transformer ): Result;


    public static function of( $value ): Result
    {
        return new static( $value );
    }

    public static function ofTry( callable $f ): Result
    {
        try
        {
            return new DataResult( $f() );
        } catch ( \Throwable $e )
        {
            return new ThrownResult( $e );
        }
    }

    public static function ofData( $value )
    {
        return new DataResult( $value );
    }

    public static function ofError( $value )
    {
        return new ErrorResult( $value );
    }

    public static function ofThrown( $value )
    {
        return new ThrownResult( $value );
    }


}