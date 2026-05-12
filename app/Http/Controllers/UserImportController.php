 class UserImportController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'Imported successfully');
    }
}