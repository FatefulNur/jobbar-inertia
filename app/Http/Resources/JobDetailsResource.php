<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\EmploymentTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class JobDetailsResource extends JsonResource
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
            'role' => $this->role,
            'apply_url' => $this->apply_url,
            'company_logo' => $this->company_logo,
            'description' => $this->description,
            'salary' => $this->salary,
            'created_at' => $this->created_at->format('F d, Y'),
        ];
    }
}
