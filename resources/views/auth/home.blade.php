@extends('auth.layouts')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center mb-4">Coding News</h2>
                <div class="mb-3">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search...">
                </div>
                <!-- Coding News -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Top 10 Programming Languages in 2024</h5>
                        <p class="card-text">Discover the top programming languages that are trending in 2024 and why you
                            should learn them.</p>
                        <small class="text-muted"><a href="https://techinsider.com" class="text-decoration-none" target="_blank">Source: Tech
                                Insider</a></small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Introduction to Machine Learning: Basics Explained</h5>
                        <p class="card-text">Get started with machine learning with this easy-to-understand guide on the
                            basics of machine learning.</p>
                        <small class="text-muted"><a href="https://datascienceweekly.com" class="text-decoration-none" target="_blank">Source: Data Science Weekly</a></small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">5 Essential Web Development Tools for 2024</h5>
                        <p class="card-text">Explore the latest and most essential tools for web developers to streamline
                            their workflow in 2024.</p>
                        <small class="text-muted"><a href="https://webdevinsights.com" class="text-decoration-none" target="_blank">Source:
                                Web Dev Insights</a></small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">10 Must-Have Programming Books for Beginners</h5>
                        <p class="card-text">Discover the essential books every beginner programmer should read to kickstart
                            their journey into coding.</p>
                        <small class="text-muted"><a href="https://codebookreviews.com" class="text-decoration-none" target="_blank">Source:
                                CodeBook Reviews</a></small>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">The Future of Artificial Intelligence: Trends and Predictions</h5>
                        <p class="card-text">Explore the future of AI and the latest trends shaping the field of artificial
                            intelligence in 2024 and beyond.</p>
                        <small class="text-muted"><a href="https://aitrends.com" class="text-decoration-none" target="_blank">Source: AI
                                Trends</a></small>
                    </div>
                </div>
                <!-- End of Coding News -->

            </div>
        </div>
    </div>
    @include('footer.inclaude')
@endsection
