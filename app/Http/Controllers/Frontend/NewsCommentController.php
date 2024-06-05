<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\NewsPost;
use App\Models\NewsComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

class NewsCommentController extends Controller
{
    /**
     * Store Comment to Database
     *
     * @param Request $request
     */
    public function store_comment(Request $request)
    {
        $news = NewsPost::findOrFail($request->news_id);

        $request->validate([
            'comment' => 'required|min:3',
        ], [
            'comment.required' => 'Please write something to comment',
            'comment.min' => 'Comment should be at least 3 charactors',
        ]);

        $status = 0;
        if ((Auth::user()->role == 'admin') && (Auth::user()->status == 'active')) {
            $status = 1;
        }

        NewsComment::insert([
            'news_id' => $news->id,
            'user_id' => Auth::user()->id,
            'text' => $request->comment,
            'status' => $status,
            'created_at' => Carbon::now(),
        ]);

        $privilegedUsers = User::permission('news.comments')->get();
        Notification::send($privilegedUsers, new CommentNotification($request));
        $notification = array(
            'message' => 'Comment Posted Successfully. Please wait to approve by an admin.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification)->with("status", "Comment Posted Successfully. Please wait to approve by an admin.");
    }


    /**
     * Showing Comments to admin
     */
    public function news_comments()
    {
        $comments = NewsComment::latest()->get();

        return view('admin.news.comments', compact('comments'));
    }


    /**
     * Approving Comments
     *
     * @param integer $id
     */
    public function news_comments_approve(int $id)
    {
        $comment = NewsComment::findOrFail($id);

        $comment->status = 1;

        $comment->save();

        $notification = array(
            'message' => 'Comment Approved',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function news_comments_delete(int $id)
    {
        $comment = NewsComment::findOrFail($id);

        $comment->delete();

        $notification = array(
            'message' => 'Comment Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Marking a notification as read
     *
     * @param string $notificationId
     */
    public function notificationMarkAsRead(string $notificationId)
    {
        $notification = DatabaseNotification::find($notificationId);

        if ($notification->read_at) {
            $notify = [];
        } else {
            $notify = array(
                'message' => 'Notification marked as read',
                'alert-type' => 'info'
            );

        }
        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('admin.news.comments')->with($notify);
    }

    /**
     * Marking all notification as read
     */
    public function allNotificationMarkAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        $notify = array(
            'message' => 'All Notification marked as read',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notify);
    }
}
