<?php 
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        // Get posts
        $posts = Post::latest()->paginate(5);

        // Render view with posts
        return view('posts.index', compact('posts')); // Use plural $posts
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        // Upload image
        $image = $request->file('image');
        $imageFile = Storage::disk('public')->put('posts', $image);

        // Create post
        Post::create([
            'image' => $imageFile,
            'title' => $request->title,
            'content' => $request->content
        ]);

        // Redirect to index
        return redirect()->route('posts.index');
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        // Get post by ID
        $post = Post::findOrFail($id);

        // Render view with post
        return view('posts.show', compact('post'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Get post by ID
        $post = Post::findOrFail($id);

        // Render view with post data
        return view('posts.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        // Get post by ID
        $post = Post::findOrFail($id);

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($post->image);

            // Upload new image
            $image = $request->file('image');
            $imageFile = Storage::disk('public')->put('posts', $image);

            // Update post with new image
            $post->update([
                'image' => $imageFile,
                'title' => $request->title,
                'content' => $request->content
            ]);

        } else {
            // Update post without image
            $post->update([
                'title' => $request->title,
                'content' => $request->content
            ]);
        }

        // Redirect to index
        return redirect()->route('posts.index')->with(['Data Berhasil di Update']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        // Get post by ID
        $post = Post::findOrFail($id);

        // Delete image
        Storage::delete('public/' . $post->image);

        // Delete post
        $post->delete();

        // Redirect to index
        return redirect()->route('posts.index')->with(['Data Berhasil Dihapus!']);
    }
}
