<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Eloquent Relationship</title>

        <link rel="stylesheet" href="{{ asset('bootstrap-4.5.3-dist/css/bootstrap.min.css') }}">
        <script src="{{ asset('bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js') }}"></script>


    </head>
    <body>
        <div class="container-fluid">

            {{-- One-to-One Relationship --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>One-to-One Relationship (Users to Phones)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone->number ?? 'No data' }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- One-to-One Relationship Inverse --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>One-to-One Relationship (<small class="text-danger">Inverse</small>: Users to Phones)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Phone</th>
                                        <th>Name</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($phones as $phone)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $phone->number }}</td>
                                            <td>{{ $phone->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- One-to-Many Relationship --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>One-to-Many Relationship (Posts to Comments)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Title Post</th>
                                        <th>Comment Lists</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                @forelse ($post->comment as $comment)
                                                    <p>{{ $comment->content }}</p>
                                                @empty
                                                    <p>No data</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- One-to-Many Relationship Inverse --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>One-to-Many Relationship (<small class="text-danger">Inverse</small>: Posts to Comments)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Comment</th>
                                        <th>Post</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $comment->content }}</td>
                                            <td>{{ $comment->post->title }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Many-to-Many Relationship --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>Many-to-Many Relationship (Users - Role User - Roles)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Name</th>
                                        <th>Roles</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($userRoles as $userRole)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $userRole->name }}</td>
                                            <td>
                                                @forelse ($userRole->roles as $role)
                                                    <p>{{ $role->name }}</p>
                                                    @empty
                                                    <p>No data!</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Many-to-Many Relationship Inverse --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>Many-to-Many Relationship (<small class="text-danger">Inverse</small>: Users - Role User - Roles)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Role</th>
                                        <th>Users</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                @forelse ($role->users as $user)
                                                    <p>{{ $user->name }}</p>
                                                @empty
                                                    <p>No data!</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Has One Through Relationship --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>Has One Through Relationship (Suppliers - Users - History)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Supplier</th>
                                        <th>User</th>
                                        <th>Histories</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->user->name }}</td>
                                            <td>
                                                {{ $supplier->userHistory->title ?? '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Has Many Through Relationship --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>Has Many Through Relationship (Countries - Users - Posts)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Country</th>
                                        <th>User</th>
                                        <th>Posts</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $country->name }}</td>
                                            <td>
                                                @forelse ($country->users as $user)
                                                    <p>{{ $user->name }}</p>
                                                @empty
                                                    <p>No data!</p>
                                                @endforelse
                                            </td>
                                            <td>
                                                @forelse ($country->posts as $post)
                                                    <p>{{ $post->title }}</p>
                                                @empty
                                                    <p>No data!</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- One to One Polymorphic Relationship --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>One to One Polymorphic Relationship (Posts - Images - Users)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Type</th>
                                        <th>Post Title</th>
                                        <th>URL</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $post->image->imageable_type ?? '-' }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->image->url ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <hr>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Type</th>
                                        <th>User Name</th>
                                        <th>URL</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $user->image->imageable_type ?? '-' }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->image->url ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- One to Many Polymorphic Relationship --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>One to Many Polymorphic Relationship (Videos - Other Comments - Posts)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Video Title</th>
                                        <th>URL</th>
                                        <th>Comments (Other Comments)</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($videos as $video)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $video->title }}</td>
                                            <td>{{ $video->url }}</td>
                                            <td>
                                                @forelse ($video->otherComments as $comment)
                                                    <p>{{ $comment->content }}</p>
                                                @empty
                                                    <p>-</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <hr>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Post Title</th>
                                        <th>User</th>
                                        <th>Comments (Other Comments)</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>
                                                @forelse ($post->otherComments as $comment)
                                                    <p>{{ $comment->content }}</p>
                                                @empty
                                                    <p>-</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Many to Many Polymorphic Relationship --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>Many to Many Polymorphic Relationship (Videos - Posts - Tags - Taggables)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Video Title</th>
                                        <th>URL</th>
                                        <th>Tags</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($videos as $video)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $video->title }}</td>
                                            <td>{{ $video->url }}</td>
                                            <td>
                                                @forelse ($video->tags as $tag)
                                                    <p>{{ $tag->name }}</p>
                                                @empty
                                                    <p>-</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <hr>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Post Title</th>
                                        <th>User</th>
                                        <th>Tags</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>
                                                @forelse ($post->tags as $tag)
                                                    <p>{{ $tag->name }}</p>
                                                @empty
                                                    <p>-</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Many to Many Polymorphic Relationship Inverse --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4 shadow">
                        <div class="card-header">
                            <h2>Many to Many Polymorphic Relationship (<small class="text-danger">Inverse</small>: Videos - Posts - Tags - Taggables)</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Tag</th>
                                        <th>Posts</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>
                                                @forelse ($tag->posts as $post)
                                                    <p>{{ $post->title }}</p>
                                                @empty
                                                    <p>-</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <hr>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th class="text-center" width="3%">#</th>
                                        <th>Tag</th>
                                        <th>Videos</th>
                                    </tr>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td class="text-center">{{ $num++ }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>
                                                @forelse ($tag->videos as $video)
                                                    <p>{{ $video->title }}</p>
                                                @empty
                                                    <p>-</p>
                                                @endforelse
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
