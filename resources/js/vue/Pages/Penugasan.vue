<script>
import { defineComponent, onMounted, ref } from 'vue'
import Modal from 'bootstrap/js/dist/modal'
export default defineComponent({
    name: 'PenugasanPage',
    components: {
    },
    setup(props, context) {
        // lifecycle hooks
        const modal = ref(null)
        const exampleModal = ref(null)
        onMounted(() => {

        })

        const openModal = () => {
            const modal = new Modal(exampleModal.value, {
                backdrop: 'static',
                keyboard: false
            })
            modal.show()
        }

        return {
            modal,
            exampleModal,

            openModal
        }
    }
})
</script>

<template>
    <div>
        <div class="nftmax-pcats">

            <!-- Profile Menu -->
            <div class="nftmax-pcats__bar">
                <div class="nftmax-pcats__list list-group " id="list-tab" role="tablist">
                    <a class="list-group-item active" data-bs-toggle="list" href="#tab_1" role="tab"
                        aria-selected="false">Objek</a>
                    <a class="list-group-item" data-bs-toggle="list" href="#tab_2" role="tab"
                        aria-selected="true">Penugasan</a>
                </div>
            </div>
            <!-- End Profile Menu -->


            <div class="tab-content mt-3" id="nav-tabContent">
                <!-- Single Tab -->
                <div class="tab-pane fade active show" id="tab_1" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="nftmax-personals">
                        <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="nftmax-ptabs__separate">
                                        <div class="nftmax-ptabs__form-main">
                                            <div class="nftmax__item-form--group">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <div class="nftmax__item-form--group nftmax-last-name">
                                                            <label class="nftmax__item-label">Frist Name </label>
                                                            <input class="nftmax__item-input" type="text"
                                                                value="Mr John" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <div class="nftmax__item-form--group">
                                                            <label class="nftmax__item-label">Last Name </label>
                                                            <input class="nftmax__item-input" type="text" value="Wick"
                                                                required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">User Name</label>
                                                <input class="nftmax__item-input" type="url" value="JohnWick@75"
                                                    required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Exter link </label>
                                                <input class="nftmax__item-input" type="url"
                                                    placeholder="https:yoursite.lo/imte/item_name123"
                                                    required="required">
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Bio </label>
                                                <textarea class="nftmax__item-input nftmax__item-textarea" type="url"
                                                    required="required">Autoglyphs are fitting the first “on-chain” to the find generative art on the Ethereum blockchain</textarea>
                                            </div>

                                            <div class="nftmax__item-form--group">
                                                <label class="nftmax__item-label">Email </label>
                                                <input class="nftmax__item-input" type="email"
                                                    value="mrjohnwick@gmail.com" required="required">
                                                <p class="nftmax__item-fee-text">Your email for marketplace
                                                    notifications</p>
                                            </div>


                                            <div class="nftmax-ptabs__social">
                                                <div class="nftmax-ptabs__accounts">
                                                    <h4 class="nftmax-ptabs__accounts-heading">Social Connections </h4>
                                                    <p class="nftmax__item-fee-text">Help collectors verify your account
                                                        by connecting Twitter</p>
                                                    <ul class="nftmax-ptabs__social-list">
                                                        <li>
                                                            <div class="nftmax-ptabs__social-name"><span
                                                                    class="nftmax-ptabs__social-icon"><i
                                                                        class="fa-brands fa-twitter"></i></span>Twitter
                                                            </div>
                                                            <p class="nftmax-ptabs__social-connect"><a
                                                                    href="#">Connect</a></p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="nftmax-ptabs__verified">
                                                    <div class="nftmax-ptabs__verified-content">
                                                        <h4 class="nftmax-ptabs__accounts-heading">Verification </h4>
                                                        <p class="nftmax__item-fee-text">Proceed with verification
                                                            process to get more visibility and gain trust on NFTMAX
                                                            Marketplace. </p>
                                                    </div>
                                                    <div class="nftmax-ptabs__verified-button">
                                                        <a href="#"
                                                            class="nftmax-btn nftmax-ptabs__verified-btn nftmax-gbcolor radius ">Get
                                                            Verificed</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nftmax-ptabs__form-update">
                                            <div class="nftmax-ptabs__sidebar">
                                                <div class="nftmax-ptabs__ssingle nftmax-ptabs__srofile">
                                                    <div class="nftmax-ptabs__sheading">
                                                        <h4 class="nftmax-ptabs__stitle">Update Profile <svg width="17"
                                                                height="17" viewBox="0 0 17 17" class="fill-current"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.5 0C3.80338 0 0 3.80622 0 8.5C0 13.1938 3.80623 17 8.5 17C13.1938 17 17 13.1938 17 8.5C16.9972 3.80907 13.1938 0.00568942 8.5 0ZM8.5 14.1695C8.10743 14.1695 7.79167 13.8537 7.79167 13.4612C7.79167 13.0686 8.10743 12.7528 8.5 12.7528C8.89257 12.7528 9.20833 13.0686 9.20833 13.4612C9.20833 13.8509 8.89257 14.1695 8.5 14.1695ZM9.86831 8.86128C9.4416 9.12868 9.19126 9.6009 9.20833 10.1016V10.6278C9.20833 11.0204 8.89257 11.3362 8.5 11.3362C8.10743 11.3362 7.79167 11.0204 7.79167 10.6278V10.1016C7.77176 9.08317 8.30371 8.13303 9.18273 7.62098C9.72038 7.32513 10.0049 6.71637 9.89107 6.11613C9.77728 5.54434 9.33066 5.09772 8.75887 4.98678C7.9908 4.84454 7.25118 5.35375 7.10894 6.12182C7.09472 6.20716 7.08618 6.2925 7.08618 6.37784C7.08618 6.77041 6.77042 7.08618 6.37785 7.08618C5.98528 7.08618 5.66952 6.77041 5.66952 6.37784C5.66952 4.81325 6.93825 3.54451 8.50569 3.54451C10.0703 3.54451 11.339 4.81325 11.339 6.38069C11.3333 7.41048 10.7729 8.36061 9.86831 8.86128Z">
                                                                </path>
                                                            </svg></h4>
                                                        <p class="nftmax-ptabs__stext">Profile of at least Size
                                                            <b>300x300.</b> Gifs work too. <b>Max 5mb.</b></p>
                                                    </div>
                                                    <div class="nftmax-ptabs__sauthor">
                                                        <div class="nftmax-ptabs__sauthor-img nftmax-ptabs__pthumb">
                                                            <img src="http://localhost:8000/assets/img/profile-thumb.png"
                                                                alt="#">
                                                            <label for="file-input"><span
                                                                    class="nftmax-ptabs__sedit"><svg width="32"
                                                                        height="32" viewBox="0 0 32 32" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M16.5147 11.5C17.7284 12.7137 18.9234 13.9087 20.1296 15.115C19.9798 15.2611 19.8187 15.4109 19.6651 15.5683C17.4699 17.7635 15.271 19.9587 13.0758 22.1539C12.9334 22.2962 12.7948 22.4386 12.6524 22.5735C12.6187 22.6034 12.5663 22.6296 12.5213 22.6296C11.3788 22.6334 10.2362 22.6297 9.09365 22.6334C9.01498 22.6334 9 22.6034 9 22.536C9 21.4009 9 20.2621 9.00375 19.1271C9.00375 19.0746 9.02997 19.0109 9.06368 18.9772C10.4123 17.6249 11.7609 16.2763 13.1095 14.9277C14.2295 13.8076 15.3459 12.6913 16.466 11.5712C16.4884 11.5487 16.4997 11.5187 16.5147 11.5Z"
                                                                            fill="white"></path>
                                                                        <path
                                                                            d="M20.9499 14.2904C19.7436 13.0842 18.5449 11.8854 17.3499 10.6904C17.5634 10.4694 17.7844 10.2446 18.0054 10.0199C18.2639 9.76139 18.5261 9.50291 18.7884 9.24443C19.118 8.91852 19.5713 8.91852 19.8972 9.24443C20.7251 10.0611 21.5492 10.8815 22.3771 11.6981C22.6993 12.0165 22.7105 12.4698 22.3996 12.792C21.9238 13.2865 21.4443 13.7772 20.9686 14.2717C20.9648 14.2792 20.9536 14.2867 20.9499 14.2904Z"
                                                                            fill="white"></path>
                                                                    </svg></span></label>
                                                            <input id="file-input" type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nftmax-ptabs__ssingle nftmax-ptabs__scover">
                                                    <div class="nftmax-ptabs__sheading">
                                                        <h4 class="nftmax-ptabs__stitle nftmax-ptabs__stitle--update">
                                                            Update Cover <svg width="17" height="17" viewBox="0 0 17 17"
                                                                class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.5 0C3.80338 0 0 3.80622 0 8.5C0 13.1938 3.80623 17 8.5 17C13.1938 17 17 13.1938 17 8.5C16.9972 3.80907 13.1938 0.00568942 8.5 0ZM8.5 14.1695C8.10743 14.1695 7.79167 13.8537 7.79167 13.4612C7.79167 13.0686 8.10743 12.7528 8.5 12.7528C8.89257 12.7528 9.20833 13.0686 9.20833 13.4612C9.20833 13.8509 8.89257 14.1695 8.5 14.1695ZM9.86831 8.86128C9.4416 9.12868 9.19126 9.6009 9.20833 10.1016V10.6278C9.20833 11.0204 8.89257 11.3362 8.5 11.3362C8.10743 11.3362 7.79167 11.0204 7.79167 10.6278V10.1016C7.77176 9.08317 8.30371 8.13303 9.18273 7.62098C9.72038 7.32513 10.0049 6.71637 9.89107 6.11613C9.77728 5.54434 9.33066 5.09772 8.75887 4.98678C7.9908 4.84454 7.25118 5.35375 7.10894 6.12182C7.09472 6.20716 7.08618 6.2925 7.08618 6.37784C7.08618 6.77041 6.77042 7.08618 6.37785 7.08618C5.98528 7.08618 5.66952 6.77041 5.66952 6.37784C5.66952 4.81325 6.93825 3.54451 8.50569 3.54451C10.0703 3.54451 11.339 4.81325 11.339 6.38069C11.3333 7.41048 10.7729 8.36061 9.86831 8.86128Z">
                                                                </path>
                                                            </svg></h4>
                                                        <p class="nftmax-ptabs__stext">Cover of at least Size
                                                            <b>1170x920</b></p>
                                                    </div>
                                                    <div class="nftmax-ptabs__sauthor">
                                                        <div class="nftmax-ptabs__sauthor-img nftmax-ptabs__pthumb">
                                                            <img src="assets/img/profile-cover.png" alt="#">
                                                            <label for="file-input"><span
                                                                    class="nftmax-ptabs__sedit"><svg width="32"
                                                                        height="32" viewBox="0 0 32 32" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M16.5147 11.5C17.7284 12.7137 18.9234 13.9087 20.1296 15.115C19.9798 15.2611 19.8187 15.4109 19.6651 15.5683C17.4699 17.7635 15.271 19.9587 13.0758 22.1539C12.9334 22.2962 12.7948 22.4386 12.6524 22.5735C12.6187 22.6034 12.5663 22.6296 12.5213 22.6296C11.3788 22.6334 10.2362 22.6297 9.09365 22.6334C9.01498 22.6334 9 22.6034 9 22.536C9 21.4009 9 20.2621 9.00375 19.1271C9.00375 19.0746 9.02997 19.0109 9.06368 18.9772C10.4123 17.6249 11.7609 16.2763 13.1095 14.9277C14.2295 13.8076 15.3459 12.6913 16.466 11.5712C16.4884 11.5487 16.4997 11.5187 16.5147 11.5Z"
                                                                            fill="white"></path>
                                                                        <path
                                                                            d="M20.9499 14.2904C19.7436 13.0842 18.5449 11.8854 17.3499 10.6904C17.5634 10.4694 17.7844 10.2446 18.0054 10.0199C18.2639 9.76139 18.5261 9.50291 18.7884 9.24443C19.118 8.91852 19.5713 8.91852 19.8972 9.24443C20.7251 10.0611 21.5492 10.8815 22.3771 11.6981C22.6993 12.0165 22.7105 12.4698 22.3996 12.792C21.9238 13.2865 21.4443 13.7772 20.9686 14.2717C20.9648 14.2792 20.9536 14.2867 20.9499 14.2904Z"
                                                                            fill="white"></path>
                                                                    </svg></span></label>
                                                            <input id="file-input" type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="nftmax__item-button--group nftmax__ptabs-bottom">
                                <button class="nftmax__item-button--single nftmax__item-button--cancel">Cancel</button>
                                <a class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius "
                                    href="http://localhost:8000/my-profile" type="submit">Update Profile</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
