<script type="text/babel">

const valueChange = () => {
    let  minAmt = document.getElementById("min-amount"),
         selectedMinAmt = minAmt.options[minAmt.selectedIndex].value,
         maxAmt = document.getElementById("max-amount"),
         selectedMaxAmt = maxAmt.options[maxAmt.selectedIndex].value,
         complaintType = document.getElementById("complaint-type"),
         selectedComplaintType = complaintType.options[complaintType.selectedIndex].value,
         subComplaintType = document.getElementById("sub-complaint-type"),
         selectedSubComplaintType = subComplaintType.options[subComplaintType.selectedIndex].value,
         gender = document.getElementById("gender"),
         selectedGender = gender.options[gender.selectedIndex].value,
         age = document.getElementById("age"),
         selectedAge = age.options[age.selectedIndex].value;
    console.log(` ==============START===========`);
    console.log(` Min-Amount : ${selectedMinAmt}`);
    console.log(` Max-amount : ${selectedMaxAmt}`);
    console.log(` Complaint-type : ${selectedComplaintType}`);
    console.log(` Sub-complaint-type : ${selectedSubComplaintType}`);
    console.log(` Gender : ${selectedGender}`);
    console.log(` Age : ${selectedAge}`);
    console.log(` ==============END===========`);
}
</script>