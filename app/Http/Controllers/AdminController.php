<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\FAQ;
use App\Models\CompanyInfo;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\TimelineEvent;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_books' => Book::count(),
            'total_categories' => Category::count(),
            'total_users' => User::count(),
            'total_admins' => User::where('is_admin', true)->count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_revenue' => Order::sum('total_price'),
            'total_timeline_events' => TimelineEvent::count(),
        ];

        return view('admin.dashboard', $stats);
    }

    // Books CRUD
    public function books()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    public function createBook()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function storeBook(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'star_rating' => 'nullable|numeric|min:0|max:5',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('books', 'public');
            $validated['cover_image'] = $path;
        }

        Book::create($validated);
        return redirect()->route('admin.books')->with('success', 'Book created successfully');
    }

    public function editBook(Book $book)
    {
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function updateBook(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'star_rating' => 'nullable|numeric|min:0|max:5',
        ]);

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('books', 'public');
            $validated['cover_image'] = $path;
        }

        $book->update($validated);
        return redirect()->route('admin.books')->with('success', 'Book updated successfully');
    }

    public function deleteBook(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books')->with('success', 'Book deleted successfully');
    }

    // Categories CRUD
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'icon' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Category::create($validated);
        return redirect()->route('admin.categories')->with('success', 'Category created successfully');
    }

    public function editCategory(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'icon' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }

    // Users CRUD
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'is_admin' => 'boolean',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['is_admin'] = $request->has('is_admin') ? true : false;
        User::create($validated);
        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'is_admin' => 'boolean',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        }

        $validated['is_admin'] = $request->has('is_admin') ? true : false;
        $user->update($validated);
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    public function deleteUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')->with('error', 'Cannot delete your own account');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    // Team Members CRUD
    public function teamMembers()
    {
        $members = TeamMember::all();
        return view('admin.team-members.index', compact('members'));
    }

    public function createTeamMember()
    {
        return view('admin.team-members.create');
    }

    public function storeTeamMember(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('team-members', 'public');
            $validated['image'] = $path;
        }

        TeamMember::create($validated);
        return redirect()->route('admin.team-members')->with('success', 'Team member created successfully');
    }

    public function editTeamMember(TeamMember $member)
    {
        return view('admin.team-members.edit', compact('member'));
    }

    public function updateTeamMember(Request $request, TeamMember $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('team-members', 'public');
            $validated['image'] = $path;
        }

        $member->update($validated);
        return redirect()->route('admin.team-members')->with('success', 'Team member updated successfully');
    }

    public function deleteTeamMember(TeamMember $member)
    {
        $member->delete();
        return redirect()->route('admin.team-members')->with('success', 'Team member deleted successfully');
    }

    // Testimonials CRUD
    public function testimonials()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function createTestimonial()
    {
        return view('admin.testimonials.create');
    }

    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create($validated);
        return redirect()->route('admin.testimonials')->with('success', 'Testimonial created successfully');
    }

    public function editTestimonial(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function updateTestimonial(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $testimonial->update($validated);
        return redirect()->route('admin.testimonials')->with('success', 'Testimonial updated successfully');
    }

    public function deleteTestimonial(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials')->with('success', 'Testimonial deleted successfully');
    }

    // FAQs CRUD
    public function faqs()
    {
        $faqs = FAQ::all();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function createFAQ()
    {
        return view('admin.faqs.create');
    }

    public function storeFAQ(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        FAQ::create($validated);
        return redirect()->route('admin.faqs')->with('success', 'FAQ created successfully');
    }

    public function editFAQ(FAQ $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function updateFAQ(Request $request, FAQ $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $faq->update($validated);
        return redirect()->route('admin.faqs')->with('success', 'FAQ updated successfully');
    }

    public function deleteFAQ(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs')->with('success', 'FAQ deleted successfully');
    }

    // Orders CRUD
    public function orders()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        $order->load('items.book', 'user');
        return view('admin.orders.show', compact('order'));
    }

    public function editOrder(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function updateOrder(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            'notes' => 'nullable|string',
        ]);

        $order->update($validated);
        return redirect()->route('admin.orders.show', $order)->with('success', 'Order updated successfully');
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully');
    }

    // Timeline Events CRUD
    public function timelineEvents()
    {
        $events = TimelineEvent::orderBy('order')->get();
        return view('admin.timeline-events.index', compact('events'));
    }

    public function createTimelineEvent()
    {
        return view('admin.timeline-events.create');
    }

    public function storeTimelineEvent(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|numeric',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|numeric',
        ]);

        TimelineEvent::create($validated);
        return redirect()->route('admin.timeline-events')->with('success', 'Timeline event created successfully');
    }

    public function editTimelineEvent(TimelineEvent $event)
    {
        return view('admin.timeline-events.edit', compact('event'));
    }

    public function updateTimelineEvent(Request $request, TimelineEvent $event)
    {
        $validated = $request->validate([
            'year' => 'required|numeric',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|numeric',
        ]);

        $event->update($validated);
        return redirect()->route('admin.timeline-events')->with('success', 'Timeline event updated successfully');
    }

    public function deleteTimelineEvent(TimelineEvent $event)
    {
        $event->delete();
        return redirect()->route('admin.timeline-events')->with('success', 'Timeline event deleted successfully');
    }
}
