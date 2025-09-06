<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Get latest vacancies with company and category
        $latestVacancies = Vacancy::with(['company', 'category'])
            ->where('status', 'open')
            ->latest()
            ->take(6)
            ->get();

        // Get all categories for filter
        $categories = Category::all();

        // Get featured companies
        $companies = Company::has('vacancies')
            ->withCount('vacancies')
            ->take(8)
            ->get();

        // Statistics
        $totalVacancies = Vacancy::where('status', 'open')->count();
        $totalCompanies = Company::has('vacancies')->count();
        $totalCategories = Category::has('vacancies')->count();

        return view('landing.index', compact(
            'latestVacancies',
            'categories',
            'companies',
            'totalVacancies',
            'totalCompanies',
            'totalCategories'
        ));
    }

    public function jobs(Request $request)
    {
        $query = Vacancy::with(['company', 'category'])
            ->where('status', 'open');

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        // Search by title
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $vacancies = $query->latest()->paginate(12);
        $categories = Category::all();

        return view('landing.jobs', compact('vacancies', 'categories'));
    }

    public function jobDetail($id)
    {
        $vacancy = Vacancy::with(['company', 'category'])->findOrFail($id);

        // Get related jobs from same company or category
        $relatedJobs = Vacancy::with(['company', 'category'])
            ->where('status', 'open')
            ->where('id', '!=', $id)
            ->where(function ($query) use ($vacancy) {
                $query->where('company_id', $vacancy->company_id)
                    ->orWhere('category_id', $vacancy->category_id);
            })
            ->take(4)
            ->get();

        return view('landing.job-detail', compact('vacancy', 'relatedJobs'));
    }

    public function companies()
    {
        $companies = Company::has('vacancies')
            ->withCount('vacancies')
            ->paginate(12);

        return view('landing.companies', compact('companies'));
    }

    public function companyDetail($slug)
    {
        $company = Company::where('slug', $slug)->firstOrFail();

        $vacancies = Vacancy::with(['category',])
            ->where('company_id', $company->id)
            ->where('status', 'open')
            ->latest()
            ->paginate(10);

        return view('landing.company-detail', compact('company', 'vacancies'));
    }
}
