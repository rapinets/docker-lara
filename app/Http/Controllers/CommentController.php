<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::paginate(25);
        //dd($comments);
        return view('comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comments = Comment::all();
        //dd($comments);
        return view('comment.create', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request): RedirectResponse
    {
        //dd($request);
        $comment = new Comment();
        $comment->parent_id = $request->parent ? $request->parent : 0;
        $comment->user_id = $request->user_id;
        $comment->content = $request->content;

        if ($comment->save()) {
            return redirect()->route('comment.index');
        }

        return redirect()->route('comment.create');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //dd($comment);
        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCommentRequest $request, Comment $comment)
    {
        if (! Gate::allows('update-comment', $comment)) {
            abort(403);
        }

        $comment->update($request->validated());

        return redirect()->route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if (! Gate::allows('delete-comment', $comment)) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('comment.index');
    }
}
