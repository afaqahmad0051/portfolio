<div class="container">
    <div class="homeContact__wrap">
        <div class="row">
            <div class="col-lg-6">
                @php
                    $footer = App\Models\Footer::find(1);
                @endphp
                <div class="section__title">
                    <span class="sub-title">Say hello</span>
                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                </div>
                <div class="homeContact__content">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                    <h2 class="mail"><a href="{{ $footer->email }}">{{ $footer->email }}</a></h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="homeContact__form">
                    <form action="{{ route('store.message') }}" method="POST">
                        @csrf
                        <input type="text" placeholder="Enter name*">
                        <input type="email" placeholder="Enter mail*">
                        <input type="number" placeholder="Enter number*">
                        <textarea name="message" placeholder="Enter Massage*"></textarea>
                        <button type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>