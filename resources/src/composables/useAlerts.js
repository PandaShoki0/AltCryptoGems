// composables/useAlerts.js
import Swal from "sweetalert2";
import { useRouter } from "vue-router";
import axios from "axios";
import { useUserStore } from "../store/user";

export function useAlerts() {
  const router = useRouter();
  const userStore = useUserStore();

  const hasPend = function () {
    return userStore.user.is_pend;
  };

  const hasLicensePrompt = function () {
    if (userStore.user.is_license_prompt) {
      if (userStore.user.license) {
        if (
          ["active_prompt", "skippable_prompt"].includes(
            userStore.user.license.license_settings.prompt
          )
        ) {
          return true;
        }
      }
    }
    return false;
  };

  const hasLimitExceeded = function () {
    return (
      userStore.user.userplan &&
      userStore.user.userplan?.currentplan?.trade_limit != 0 &&
      userStore.user.recordLimits?.trades >
        userStore.user.userPlan?.currentplan?.trade_limit
    );
  };

  const showAllAlertsSequentially = async function () {
    if (hasPend()) {
      await Swal.fire({
        title: "UPGRADE REQUIRED",
        text: userStore.user.pend_message,
        icon: "warning",
        button: "CLOSE",
      });
    }

    if (hasLicensePrompt()) {
      const skippable =
        userStore.user.license.license_settings.prompt === "skippable_prompt";
      await Swal.fire({
        title: userStore.user.license.message,
        input: "text",
        inputPlaceholder: userStore.user.license.message,
        confirmButtonText: "SUBMIT",
        showLoaderOnConfirm: true,
        cancelButtonText: "SKIP NOW",
        showCancelButton: skippable,
        showCloseButton: skippable,
        preConfirm: async (value) => {
          try {
            const response = await axios.post("/user/verify-license", {
              license_key: value,
            });
            if (response.success) {
              return response;
            } else {
              Swal.showValidationMessage(response.message);
            }
          } catch (error) {
            Swal.showValidationMessage(error.message);
          }
        },
        allowOutsideClick: () => false,
      });
    }

    if (hasLimitExceeded()) {
      await Swal.fire({
        title: "UPGRADE REQUIRED",
        text: "You have exceeded your daily Trade Limits! To continue trading, Upgrade your Account Type",
        icon: "warning",
        button: "UPGRADE NOW",
      }).then((result) => {
        if (result.value) {
          router.push({ path: "/plan" });
        }
      });
    }
  };

  return {
    showAllAlertsSequentially,
    hasPend,
    hasLicensePrompt,
    hasLimitExceeded,
  };
}
