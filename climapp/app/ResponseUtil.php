<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseUtil extends Model {

    protected $fillable = ["message", "object", "objectResponse", "responseList", "tipo", "token"];

    /**
     * Set the ResponseUtil's message.
     *
     * @param  any  $value
     * @return void
     */
    public function setMessageAttribute($value)
    {
        $this->attributes['message'] = $value;
    }

    /**
     * Get the ResponseUtil's message.
     *
     * @param  any  $value
     * @return string
     */
    public function getMessageAttribute($value)
    {
        return $value;
    }

    /**
     * Set the ResponseUtil's object.
     *
     * @param  object  $value
     * @return void
     */
    public function setObjectAttribute($value)
    {
        $this->attributes['object'] = $value;
    }

    /**
     * Get the ResponseUtil's object.
     *
     * @param  object  $value
     * @return string
     */
    public function getObjectAttribute($value)
    {
        return $value;
    }

    /**
     * Set the ResponseUtil's objectResponse.
     *
     * @param  object  $value
     * @return void
     */
    public function setObjectResponseAttribute($value)
    {
        $this->attributes['objectResponse'] = $value;
    }

    /**
     * Get the ResponseUtil's objectResponse.
     *
     * @param  object  $value
     * @return object
     */
    public function getObjectResponseAttribute($value)
    {
        return $value;
    }

    /**
     * Set the ResponseUtil's responseList.
     *
     * @param  array  $value
     * @return void
     */
    public function setResponseListAttribute($value)
    {
        $this->attributes['responseList'] = $value;
    }

    /**
     * Get the ResponseUtil's responseList.
     *
     * @param  array  $value
     * @return string
     */
    public function getResponseListAttribute($value)
    {
        return $value;
    }

    /**
     * Set the ResponseUtil's tipo.
     *
     * @param  string  $value
     * @return void
     */
    public function setTipoAttribute($value)
    {
        $this->attributes['tipo'] = $value;
    }

    /**
     * Get the ResponseUtil's tipo.
     *
     * @param  string  $value
     * @return string
     */
    public function getTipoAttribute($value)
    {
        return $value;
    }

    /**
     * Set the ResponseUtil's token.
     *
     * @param  string  $value
     * @return void
     */
    public function setTokenAttribute($value)
    {
        $this->attributes['token'] = $value;
    }

    /**
     * Get the ResponseUtil's token.
     *
     * @param  string  $value
     * @return string
     */
    public function getTokenAttribute($value)
    {
        return $value;
    }
}
