<!-- Testimonials Section
================================================== -->
<section id="testimonials">

    <div class="row">
        <div class="col-twelve">
            <h2 class="animate-this">What They Say About Us.</h2>
        </div>
    </div>

    <div class="row flex-container">

        <div id="testimonial-slider" class="flex-slider animate-this">

            <ul class="slides">
                @foreach($teachers as $teacher)
                    <li>
                        <p>
                            {{ $teacher->word }}
                        </p>

                        <div class="testimonial-author">
                            <img src="{{ asset($teacher->image) }}" alt="Author image">
                            <div class="author-info">
                                {{ $teacher->name }}
                                <span class="position">{{ $teacher->position }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</section>
<!-- end testimonials -->