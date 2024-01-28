<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToolCategory;
use App\Models\ToolSubCategory;
use App\Models\Tool;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;


class ToolsController extends Controller
{
   public function index()
   {
    
    $toolCategories = ToolCategory::all();
    return view('pages.tools', compact('toolCategories'));
   }

   public function resume_builder()
   {
       return view('pages.resume_builder');
   }



   public function nhs_cv_templates()
   {
       return view('pages.nhs_cv_templates');
   }


   public function toolCategories()
   {
       $toolCategories = ToolCategory::all();
       return view('pages.tool_categories', compact('toolCategories'));
   }

   public function tool_subcategories($categoryRoute)
   {

  
    $subcategoryData = DB::table('tool_categories')
    ->where('tool_categories.route', $categoryRoute)
    ->join('tool_subcategories', 'tool_categories.id', '=', 'tool_subcategories.tool_category_id')
    ->select('tool_subcategories.*', 'tool_categories.route as categoryRoute', 'tool_categories.display_title as categoryDisplayTitle', 'tool_categories.display_description as categoryDisplayDesc', 'tool_categories.route as categoryRoute') // Select columns from tool_subcategories table that you need
    ->get();
    
   
    return view('pages.tool_subcategories', ['subcategoryData' => $subcategoryData]);
   }

   public function tool_templates($categoryRoute, $subcategoryRoute)
   {
    $toolData = DB::table('tool_categories')
    ->where('tool_categories.route', $categoryRoute)
    ->join('tool_subcategories', 'tool_categories.id', '=', 'tool_subcategories.tool_category_id')
    ->join('tools', 'tool_subcategories.id', '=', 'tools.tool_subcategory_id')
    ->select('tools.*', 'tool_categories.display_title as categoryDisplayTitle', 'tool_categories.display_description as categoryDisplayDesc', 'tool_subcategories.display_title as subcategoryDisplayTitle', 'tool_subcategories.display_description as subcategoryDisplayDesc', 'tool_categories.route as categoryRoute', 'tool_subcategories.route as subCategoryRoute') // Select columns from tool_subcategories table that you need
    ->get();
   
    return view('pages.tool_templates', ['toolData' => $toolData]);
   }


   public function tool_page($categoryRoute, $subcategoryRoute, $toolRoute){
    $toolData = DB::table('tool_categories')
    ->where('tool_categories.route', $categoryRoute)
    ->join('tool_subcategories', 'tool_categories.id', '=', 'tool_subcategories.tool_category_id')
    ->join('tools', 'tool_subcategories.id', '=', 'tools.tool_subcategory_id')
    ->select('tools.*', 'tool_categories.display_title as categoryDisplayTitle', 'tool_categories.display_description as categoryDisplayDesc', 'tool_subcategories.display_title as subcategoryDisplayTitle', 'tool_subcategories.display_description as subcategoryDisplayDesc', 'tool_categories.route as categoryRoute', 'tool_subcategories.route as subCategoryRoute') // Select columns from tool_subcategories table that you need
    ->where('tools.route', $toolRoute)
    ->first();


   
    return view('pages.tool_page', ['toolData' => $toolData]);
   }

   

   public function listing_tools_categories()
   {
    $toolCategories = ToolCategory::paginate(10); 

   
       return view('auth.adminpages.tool_categories', compact('toolCategories'));
   }


   public function listing_tools_subcategories()
   {
      $toolSubCategories = ToolSubCategory::with('toolCategory')->paginate(10);
     
     return view('auth.adminpages.tool_subcategories', compact('toolSubCategories'));
   }

    public function listing_tools()
    {
         $tools = Tool::with('toolCategory','toolSubCategory')->paginate(10);
         return view('auth.adminpages.tools', compact('tools'));
    }


   public function create_tool_category()
   {
       return view('auth.adminpages.create_tool_category');
   }

   public function categoryFronendPage(){
    
   }

   public function create_tool()
   {
       $toolCategories = ToolCategory::all();
       $toolSubCategories = ToolSubCategory::all();

       return view('auth.adminpages.create_tool', compact('toolCategories','toolSubCategories'));
   }

   public function create_tool_subcategory()
   {
    $toolCategories = ToolCategory::all();

    return view('auth.adminpages.create_tool_subcategory', compact('toolCategories'));
   }
   
   public function edit_tool_category($id)
   {
      // Retrieve the tool category with the given ID
    $toolCategory = ToolCategory::findOrFail($id);

    // Pass the tool category data to the view
    return view('auth.adminpages.edit_tool_category', compact('toolCategory'));
   }

   public function edit_tool_subcategory($id)
   {
      // Retrieve the tool category with the given ID
    $toolSubCategory = ToolSubCategory::findOrFail($id);
    $toolCategories = ToolCategory::all();

    // Pass the tool category data to the view
    return view('auth.adminpages.edit_tool_subcategory', compact('toolSubCategory','toolCategories'));
   }


   public function save_tools_category(Request $request)
   {
    $request->validate([
        'name' => 'required',
        'display_title' => 'required',
        'display_description' => 'required',
        'meta_title' => 'required',
        'meta_description' => 'required',
        'route' => 'required',
        
    ]);
    $homePageVisibilityValue = $request->has('home_page_visibility') ? 1 : 0;
    // Use the ToolCategory model to store the data
    ToolCategory::create([
        'name' => $request->input('name'),
        'display_title' => $request->input('display_title'),
        'display_description' => $request->input('display_description'),
        'meta_title' => $request->input('meta_title'),
        'meta_description' => $request->input('meta_description'),
        'route' => $request->input('route'),
        'tool_icon'=>$request->input('tool_icon'),
        'home_page_visibility' =>$homePageVisibilityValue,
    ]);

    // Redirect to the specified route
return redirect()->route('listing-tools-categories')->with('success', 'Tool category created successfully!');
   }

   public function update_tool_category(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'display_title' => 'required|string|max:255',
        'display_description' => 'required|string|max:255',
        'route' => 'required|string|max:255',
        'meta_title' => 'required|string|max:255',
        'meta_description' => 'required|string|max:255',
        'home_page_visibility' => 'nullable|boolean',
    ]);

    // Find the tool category by ID
    $toolCategory = ToolCategory::findOrFail($id);

    // Update the tool category with the validated data
    $toolCategory->update([
        'name' => $request->input('name'),
        'display_title' => $request->input('display_title'),
        'display_description' => $request->input('display_description'),
        'route' => $request->input('route'),
        'meta_title' => $request->input('meta_title'),
        'meta_description' => $request->input('meta_description'),
        'tool_icon'=>$request->input('tool_icon'),
        'home_page_visibility' => $request->has('home_page_visibility') ? 1 : 0,
    ]);

    // Redirect or respond as needed
    return redirect()->route('listing-tools-categories', $toolCategory->id)->with('success', 'Tool category updated successfully!');
}


public function save_tools_subcategory(Request $request)
   {
    $request->validate([
       
        'display_title' => 'required',
        'display_description' => 'required',
        'meta_title' => 'required',
        'meta_description' => 'required',
        'route' => 'required',
        'tool_category_id' => 'required',
    ]);
    $homePageVisibilityValue = $request->has('home_page_visibility') ? 1 : 0;
    // Use the ToolCategory model to store the data
    ToolSubCategory::create([
        
        'display_title' => $request->input('display_title'),
        'display_description' => $request->input('display_description'),
        'meta_title' => $request->input('meta_title'),
        'meta_description' => $request->input('meta_description'),
        'route' => $request->input('route'),
        'tool_category_id'=>$request->input('tool_category_id'),
        'home_page_visibility' =>$homePageVisibilityValue,
    ]);

    // Redirect to the specified route
return redirect()->route('listing-tools-subcategories')->with('success', 'Tool sub category created successfully!');
   }



   public function update_tool_subcategory(Request $request, $id)
   {
       // Validate the incoming request data
       $request->validate([
        'display_title' => 'required',
        'display_description' => 'required',
        'meta_title' => 'required',
        'meta_description' => 'required',
        'route' => 'required',
        'tool_category_id' => 'required',
       ]);
   
       // Find the tool category by ID
       $toolSubCategory = ToolSubCategory::findOrFail($id);
   
       // Update the tool category with the validated data
       $toolSubCategory->update([
           'name' => $request->input('name'),
           'display_title' => $request->input('display_title'),
           'display_description' => $request->input('display_description'),
           'route' => $request->input('route'),
           'meta_title' => $request->input('meta_title'),
           'meta_description' => $request->input('meta_description'),
           'home_page_visibility' => $request->has('home_page_visibility') ? 1 : 0,
           'tool_category_id'=>$request->input('tool_category_id'),
       ]);
   
       // Redirect or respond as needed
       return redirect()->route('listing-tools-subcategories', $toolSubCategory->id)->with('success', 'Tool sub category updated successfully!');
   }



   public function save_tool(Request $request)
   {
    
       // Validate the incoming request data
       $request->validate([
           'meta_title' => 'required',
           'meta_description' => 'required',
           'display_title' => 'required',
           'display_description' => 'required',
           'route' => 'required',
           'html_content' => 'required',
           'css' => 'required',
           'script' => 'required',
           'tool_category_id' => 'required',
           'tool_subcategory_id' => 'required',
           'preview_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust allowed file types and maximum size
       ]);
// Handle file upload for the preview image
if ($request->hasFile('preview_image')) {
    $previewImagePath = $request->file('preview_image')->store('assets/tools');
} else {
    $previewImagePath = null;
}


       // Create a new tool instance and save it to the database
       $tool = Tool::create([
           'meta_title' => $request->input('meta_title'),
           'meta_description' => $request->input('meta_description'),
           'display_title' => $request->input('display_title'),
           'display_description' => $request->input('display_description'),
           'home_page_visibility' => $request->input('home_page_visibility', 0), // Default to 0 if not provided
           'route' => $request->input('route'),
           'html_content' => $request->input('html_content'),
           'css' => $request->input('css'),
           'script' => $request->input('script'),
           'tool_category_id' => $request->input('tool_category_id'),
           'tool_subcategory_id' => $request->input('tool_subcategory_id'),
           'preview_image' => $previewImagePath,
       ]);

       // Redirect or respond as needed
       return redirect()->route('listing-tools')->with('success', 'Tool created successfully!');
   }


   public function edit_tool($id)
   {
       $tool = Tool::findOrFail($id);
       $toolCategories = ToolCategory::all(); // Assuming ToolCategory model exists
       $toolSubCategories = ToolSubCategory::all(); // Assuming ToolSubCategory model exists

       return view('auth.adminpages.edit_tool', compact('tool', 'toolCategories', 'toolSubCategories'));
   }


   public function update_tool(Request $request, $id)
   {
       $request->validate([
           'display_title' => 'required',
           'display_description' => 'required',
           'route' => 'required',
           'meta_title' => 'required',
           'meta_description' => 'required',
           'tool_category_id' => 'required',
           'tool_subcategory_id' => 'required',
           'html_content' => 'required',
           'css' => 'required',
           'script' => 'required',
           'home_page_visibility' => 'nullable|boolean',
           'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
       ]);

       $tool = Tool::findOrFail($id);

       // Update the tool attributes
       $tool->update([
           'display_title' => $request->input('display_title'),
           'display_description' => $request->input('display_description'),
           'route' => $request->input('route'),
           'meta_title' => $request->input('meta_title'),
           'meta_description' => $request->input('meta_description'),
           'tool_category_id' => $request->input('tool_category_id'),
           'tool_subcategory_id' => $request->input('tool_subcategory_id'),
           'html_content' => $request->input('html_content'),
           'css' => $request->input('css'),
           'script' => $request->input('script'),
           'home_page_visibility' => $request->input('home_page_visibility', false),
       ]);

       // Handle the preview_image upload
       if ($request->hasFile('preview_image')) {
           $previewImagePath = $request->file('preview_image')->store('assets/tools');
           $tool->update(['preview_image' => $previewImagePath]);
       }

       return redirect()->route('listing-tools')->with('success', 'Tool created successfully!');
   }




   
   public function exportDocx(Request $request)
   {

          $html =$request->css_content.$request->input('html_content');
       // Load the Blade view and get HTML content
       $pdf = PDF::loadHTML($html);

    // Download the PDF
    return $pdf->download('invoice.pdf');
   }




   

   
}
