function launchModal(id)
{
    const title = $(`#title_${id}`).val();
    const description = $(`#description_${id}`).val();
    var baseRoute = $('#route').attr('content');
    var route = baseRoute + '/' + id;
    $('#formulary').attr('action', route); 
    $('#titleup').val(title); 
    $('#descriptionup').val(description);  
    $('#modal').modal('show');
  
}
