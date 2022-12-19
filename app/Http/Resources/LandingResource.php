<?php

namespace App\Http\Resources;

class LandingResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $app_url = config()->get('app.url');
        $uri = ($app_url == 'http://localhost') ? $app_url . ':8000/' : $app_url . '/';

        return [
            'uri' => $uri . $this->uri,
            'route' => $this->action['as'],
            'prefix' => $this->action['prefix'],
            'controller' => $this->action['controller'],
            'http_method' => $this->methods,
            'middleware' => $this->action['middleware']
        ];
    }
}