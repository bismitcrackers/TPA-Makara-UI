<div class="fixed-bottom d-flex justify-content-center">
    <div class="col-md-8 p-0">
    <nav class="boxfooter d-flex justify-content-around">
        @if(auth()->user() == null)
        <a href="{{ route('index') }}">
        @elseif(auth()->user()->roles()->first()->description == 'Full Access')
        <a href="{{ route('admin.home') }}">
        @elseif(auth()->user()->roles()->first()->name == 'Fasilitator')
        <a href="{{ route('fasilitator.home') }}">
        @elseif(auth()->user()->roles()->first()->name == 'Orangtua')
        <a href="{{ route('orangtua.home') }}">
        @elseif(auth()->user()->roles()->first()->name == 'Co-fasilitator')
        <a href="{{ route('cofasilitator.home') }}">
        @elseif(auth()->user()->roles()->first()->name == 'Guru')
        <a href="{{ route('guru.home') }}">
        @endif
            <div class= "nav-pane ml-3 mr-3">
                <img src="{{asset('svg/home.svg')}}" alt="home">
                <p>Home</p>
            </div>
        </a>
        @if(auth()->user() == null)
            <a href="{{ route('login') }}">
        @elseif(auth()->user()->roles()->first()->description == 'Full Access' || auth()->user()->roles()->first()->name == 'Fasilitator')
            <a href="{{ route('dailyBook.class') }}">
        @elseif(auth()->user()->roles()->first()->name == 'Orangtua')
            @if(auth()->user()->student()->first()->kelas == 'Day Care')
            <!-- <a href="{{ route('dailyBook.dc.date.parent', ['student_id' => auth()->user()->student()->first()->id]) }}"> -->
            <a href="{{ route('dailyBook.dc.month', ['student_id' => auth()->user()->student()->first()->id]) }}">
            @elseif(auth()->user()->student()->first()->kelas == 'Kelompok Bermain')
            <!-- <a href="{{ route('dailyBook.kb.date.parent', ['student_id' => auth()->user()->student()->first()->id]) }}"> -->
            <a href="{{ route('dailyBook.kb.month', ['student_id' => auth()->user()->student()->first()->id]) }}">
            @endif
        @elseif(auth()->user()->roles()->first()->name == 'Co-fasilitator')
            <a href="{{ route('dailyBook.dc.student') }}">
        @elseif(auth()->user()->roles()->first()->name == 'Guru')
            <a href="{{ route('dailyBook.kb.student') }}">
        @endif
            <div class= "nav-pane mr-3">
                <img src="{{asset('svg/studentbooks.svg')}}" alt="studentbooks">
                <p>Student Book's</p>
            </div>
        </a>
        @if(auth()->user() == null)
        <a href="{{ route('login') }}">
        @else
        <a href="{{ route('notification') }}">
        @endif
            <div class= "nav-pane mr-3">
                <div class="icon-notification">
                    <img src="{{asset('svg/notification.svg')}}" alt="notification">
                    @if(auth()->user() != null)
                    <span class="num"><?php echo App\Notification::whereHas('users', function ($query) {
                        $query->where('users.id', auth()->user()->id);
                    })->where('is_read', false)->get()->count(); ?></span>
                    @endif
                </div>
                <p>Notification</p>
            </div>
        </a>
        @if(auth()->user() == null)
        <a href="{{ route('login') }}">
        @elseif(auth()->user()->roles()->first()->description == 'Full Access' || auth()->user()->roles()->first()->name == 'Fasilitator')
        <a href="{{ route('profile.typeclass') }}">
        @elseif(auth()->user()->roles()->first()->name == 'Co-fasilitator')
        <a href="{{ route('profile.dc.student') }}">
        @elseif(auth()->user()->roles()->first()->name == 'Guru')
        <a href="{{ route('profile.kb.student') }}">
        @elseif(auth()->user()->roles()->first()->name == 'Orangtua')
        <a href="{{ route('profile.edit.details', ['student_id' => auth()->user()->student()->first()->id]) }}">
        @endif
            <div class= "nav-pane">
                <img src="{{asset('svg/studentprofile.svg')}}" alt="studentprofile">
                <p>Student Profile</p>
            </div>
        </a>
    </nav>
    </div>
</div>
