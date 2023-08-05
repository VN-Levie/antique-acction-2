<template>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            </div>
            <div class="col-md-5 rounded-lg shadow border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right font-extrabold text-[30px]">Password Setting</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels"> Old Password</label><input type="text"
                                class="form-control"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">New Password</label><input type="text"
                                class="form-control"></div>
                        <div class="col-md-12"><label class="labels">Confirm New Password</label><input type="text"
                                class="form-control"></div>

                    </div>
                    <div class="row mt-10">
                        <div class="col-md-3"><button class="btn btn-primary profile-button" type="button">Save
                                Profile</button></div>
                        <div class="col-md-6"><a :href="route('profile.index')"
                                class="btn btn-primary profile-button-cancel" type="button">Cancel</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
</script>