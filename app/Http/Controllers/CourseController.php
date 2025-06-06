<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected array $courses = [
        1 => [
            'id' => 1,
            'title' => 'Liderazgo Industrial',
            'description' => 'Desarrolla habilidades de liderazgo efectivo para el entorno industrial moderno.',
            'price' => 1000,
        ],
        2 => [
            'id' => 2,
            'title' => 'Gestión de Calidad ISO 9001',
            'description' => 'Aprende a implementar y mantener un sistema de gestión de calidad efectivo.',
            'price' => 1200,
        ],
        3 => [
            'id' => 3,
            'title' => 'Seguridad Industrial Avanzada',
            'description' => 'Estrategias efectivas para garantizar la seguridad en entornos industriales.',
            'price' => 1500,
        ],
    ];

    public function getCourses(): array
    {
        return $this->courses;
    }

    public function index()
    {
        $courses = $this->courses;
        return view('course_list', compact('courses'));
    }

    public function show(int $id)
    {
        $course = $this->courses[$id] ?? null;
        if (!$course) {
            abort(404);
        }
        return view('course', compact('course'));
    }
}