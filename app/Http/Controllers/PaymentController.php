<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    protected array $courses;

    public function __construct(CourseController $courseController)
    {
        $this->courses = $courseController->getCourses();
    }

    public function checkout(int $id)
    {
        $course = $this->courses[$id] ?? null;
        if (!$course) {
            abort(404);
        }
        return view('payment', compact('course'));
    }

    public function process(Request $request)
    {
        $courseId = (int) $request->input('course_id');
        $course = $this->courses[$courseId] ?? null;
        if (!$course) {
            abort(404);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            PaymentIntent::create([
                'amount' => $course['price'] * 100,
                'currency' => 'mxn',
                'payment_method' => $request->input('payment_method'),
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);
            return view('payment_result', ['success' => true, 'course' => $course]);
        } catch (\Exception $e) {
            return view('payment_result', [
                'success' => false,
                'message' => $e->getMessage(),
                'course' => $course,
            ]);
        }
    }
}