<x-layout>
    <div class="d-flex flex-row align-items-left">
        <span class="back">&lt;</span>
        <a href="/admin" class="backs">back</a>
    </div>

    <div class="d-flex flex-column align-items-center gap-4">
        <h3 class="desc">Add Sponsor!</h3>
        <div class="cards">
            <div class="card-body">
                <form action="/sponsorform" method="POST">
                @csrf
                    <div class="row mb-3">
                        <label for="sponsorName" class="col-sm-2 col-form-label">Upload Brand Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="image" type="file" id="sponsorName" placeholder="Enter Event Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sponsorName" class="col-sm-2 col-form-label">Sponsor Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="name" type="text" id="sponsorName" placeholder="Enter Event Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sponsorLocation" class="col-sm-2 col-form-label">Sponsor Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" id="sponsorEmail" name="email" placeholder="Enter Sponsor Location">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sponsorDescription" class="col-sm-2 col-form-label">Sponsor Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="sponsorDescription" name="description" rows="5" placeholder="Enter sponsor description"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-white btn-l mb-4" style="font-size:15px;">Add Sponsor</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
