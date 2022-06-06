<div class="delete-account-container" id="delete-account-container">
                    <form id="personal-delete-account" class="personal-delete-account">
                        <h4 class='personal_setting_header delete'>
                            Delete Account
                        </h4>
                        <div class="change-password-box">

                            <div class="delete-warning-box">
                                <p>Once you delete this account,there's no getting it back. Make sure you want to do this.</p>
                            </div>
                            <input type="text" value="" id="to-be-delete-id" name="to-be-delete-id" required readonly class="hidden">
                            <div class="input-label">
                                <label for="delete-admin-password">
                                     Admin Password
                                </label>
                                <input type="password" name="delete-admin-password" id="delete-admin-password" required >
                            </div>
                            
                            <div class="error-section" id="delete-acc-err">

                            </div>
                            <div class="change-btn-box">
                                <button  onclick="closer('delete-account-container')" class="btn btn_delete-cancel" id="deleteAccountCancel">Cancel</button>
                                <input type="submit" name="createAccount" id="deleteAccount" value="Delete Account"
                                class="btn btn_cancel"
                                >
                            </div>



                        </div>



                    </form>


                    </div>


                </div>
