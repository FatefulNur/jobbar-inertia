<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeJobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'employment_type' => EmploymentTypeResource::make($this->employment_type),
            'company_name' => $this->company_name,
            'company_logo' => $this->company_logo,
            'description' => str($this->description)->limit(200),
            'salary' => $this->salary,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
