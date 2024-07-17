<?php

namespace App\Http\Controllers\Cabinet\Comments;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $comments = auth()->user()->comments;

        return view('cabinet.comments.index', compact('comments'));
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $comment
     * @return Application|Factory|View
     */
    public function show(Comment $comment): View|Factory|Application
    {
        return view('cabinet.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     * @return Application|Factory|View
     */
    public function edit(Comment $comment): Application|Factory|View
    {
        return view('cabinet.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function update(Request $request, Comment $comment): RedirectResponse
    {
        $data = request()->validate([
            'message' => 'required|string',
        ]);

        $comment->update($data);

        return redirect()->route('comments.index')
            ->with('success','Comment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->route('comments.index')
            ->with('success','Comment deleted successfully!');
    }
}
