<?php
/** Created by User: azder on Date: 21/03/2017 */

namespace Azder\R;


abstract class Res implements Result
{

    protected $value;

    abstract public static function of( $value ): Result;

    abstract public function chain( callable $transformer ): Result;

    abstract public function bimap( callable $etransformer, callable $transformer ): Result;

    protected function __construct( $value )
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    public function map( callable $transformer ): Result
    {
        // function map(f) { return this.chain(a => this.of(f(a))); }
        return $this->chain( function ( $value ) use ( $transformer )
        {
            return static::of( $transformer( $value ) );
        } );
    }

    public function ap( Result $result ): Result
    {
        // function ap(m) { return m.chain(f => this.map(f)); }
        return $result->chain( function ( $value )
        {
            return $this->map( $value );
        } );
    }

    public static function ofTry( callable $f, $class = DataResult::class )
    {
        try
        {
            $res = $f();
            return null === $class ? $res : new $class( $res );
        } catch ( \Throwable $e )
        {
            return new ThrownResult( $e );
        }
    }

    public static function ofList( ...$values ): Result
    {
        return ListResult::of( ...$values );
    }

    public static function ofData( $value ): Result
    {
        return DataResult::of( $value );
    }

    public static function ofError( $value ): Result
    {
        return ErrorResult::of( $value );
    }

    public static function ofThrown( $value ): Result
    {
        return ThrownResult::of( $value );
    }


}