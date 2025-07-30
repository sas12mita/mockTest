<?php

namespace App\Http\Controllers;

use \Log;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DemoRequestController extends Controller
{
    public function demostore(Request $request)
    {
        if (!empty($request->address)) {
            abort(403, 'Bot detected');
        }
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email',
            'phone_number' => 'required|string',
            'institution_name' => 'nullable|string|max:255',
            'desired_subdomain' => 'required|string|max:24',
            'keywords' => 'required|string|max:255',
        ]);


        try {
            // Use desired_subdomain as database name
            $database = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $request->desired_subdomain));

            // Ensure unique database name
            $baseDb = $database;
            $counter = 1;
            while (Tenant::where('database', $database)->exists()) {
                $database = $baseDb . $counter++;
            }

            Tenant::create([
                'full_name'       => $request->full_name,
                'email'           => $request->email,
                'phone_number'    => $request->phone_number,
                'institution_name' => $request->institution_name,
                'desired_subdomain' => $request->desired_subdomain,
                'keywords'        => $request->keywords,
                'database'        => $database,
            ]);
            return back()->with('success', 'Tenant inquiry submitted successfully.');
        } catch (\Exception $e) {
            Log::error('Tenant creation failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function displaydemo()
    {
        $demo_requests = Tenant::all();
        // return $demo_requests;
        return view('demo-display', compact('demo_requests'));
    }

    public function statusupdate($id)
    {
        $demo = Tenant::findOrFail($id);
        $demo->status = "decline";
        $demo->save();
        return redirect()->back()->with('success', 'status updated successfully');
    }
    // public function updateday(Request $request, $id)
    // {
    //     $day = Tenant::findOrFail($id);
    //     $day->days = $request->days;
    //     $day->status = "approved";
    //     $day->save();
    //     $database = $day->database;
    //     $sourceDb = 'app.projectsayogi@123';
    //     $newDb = $database;


    //     DB::statement("CREATE DATABASE `$newDb`");

    //     $tables = DB::select("SHOW TABLES FROM `$sourceDb`");
    //     $tableKey = 'Tables_in_' . strtolower($sourceDb);

    //     foreach ($tables as $table) {
    //         $tableName = $table->$tableKey;
    //         DB::statement("CREATE TABLE `$newDb`.`$tableName` LIKE `$sourceDb`.`$tableName`");
    //         DB::statement("INSERT INTO `$newDb`.`$tableName` SELECT * FROM `$sourceDb`.`$tableName`");
    //     }


    //     Mail::send('mailforclient', [
    //         'name' => $day->name,
    //         'username' => 'admin@gmail.com',
    //         'password' => '12345678',
    //         'slug' => $database,
    //     ], function ($message) use ($day) {
    //         $message->to($day->email)
    //             ->subject('Your ProjectSayogi Login Details');
    //     });

    //     return redirect()->back()->with('success', 'day updated successfully');
    // }

    public function demoupdate($id)
    {
        // Validate the incoming request data
        $validatedData = request()->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'desired_subdomain' => 'required|string|max:255',
            'institution_name' => 'required|string|max:255',
            'keywords' => 'required|string|max:255',
            'database' => 'required|string|max:255',
            'days' => 'nullable|integer|min:0',
        ]);

        try {
            $demoRequest = Tenant::findOrFail($id);

            $demoRequest->update([
                'full_name' => $validatedData['full_name'],
                'phone_number' => $validatedData['phone_number'],
                'email' => $validatedData['email'],
                'desired_subdomain' => $validatedData['desired_subdomain'],
                'institution_name' => $validatedData['institution_name'],
                'keywords' => $validatedData['keywords'],
                'database' => $validatedData['database'],
                'days' => $validatedData['days'] ?? null,
            ]);

            // Return success response
            return redirect()->back()->with('success', 'Tenant updated successfully!');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error updating tenant: ' . $e->getMessage());

            // Return error response
            return redirect()->back()->with('error', 'Failed to update tenant. Please try again.');
        }
    }
    public function destroy(Request $request, $id)
    {
        // Find the tenant
        $tenant = Tenant::findOrFail($id);


        $databaseName = $tenant->database;

        if (DB::statement("DROP DATABASE IF EXISTS `$databaseName`")) {

            $tenant->delete();

            return redirect()->back()->with('success', 'Tenant and associated database deleted successfully.');
        }

        return redirect()->back()->with('error', 'Failed to delete the tenant database.');
    }


    // public function updateday(Request $request, $id)
    // {

    //     $day = Tenant::findOrFail($id);
    //     $sourceDb = 'app.mocktest@123';
    //     $day->days = $request->days;
    //     $database = $day->database;
    //     $newDb = $database;

    //     // ✅ Check if the database already exists
    //     $dbExists = DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$newDb]);

    //     if ($dbExists) {
    //         return redirect()->back()->with('error', 'Database already exists!');
    //     }


    //     $day->status = "approved";
    //     $day->save();


    //     // ✅ Create the new database
    //     DB::statement("CREATE DATABASE `$newDb`");

    //     $tables = DB::select("SHOW TABLES FROM `$sourceDb`");
    //     $tableKey = 'Tables_in_' . strtolower($sourceDb);

    //     foreach ($tables as $table) {
    //         $tableName = $table->$tableKey;
    //         DB::statement("CREATE TABLE `$newDb`.`$tableName` LIKE `$sourceDb`.`$tableName`");
    //         DB::statement("INSERT INTO `$newDb`.`$tableName` SELECT * FROM `$sourceDb`.`$tableName`");
    //     }

    //     // ✅ Send email to client
    //     Mail::send('mailforclient', [
    //         'name' => $day->name,
    //         'username' => 'admin@gmail.com',
    //         'password' => '12345678',
    //         'slug' => $database,
    //     ], function ($message) use ($day) {
    //         $message->to($day->email)
    //             ->subject('Your ProjectSayogi Login Details');
    //     });

    //     return redirect()->back()->with('success', 'Day updated and database created successfully.');
    // }

    public function updateday(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
        $sourceDb = 'app.mocktest@123';
        $days = $request->days;
        $newDb = $tenant->database;

        //Check if target database exists
        if (DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$newDb])) {
            $tenant->update([
                'days' => $days,
                'status' => 'approved'
            ]);
            DB::statement("TRUNCATE TABLE `$newDb`.`subscription`");
            DB::statement("
                    INSERT INTO `$newDb`.`subscription` 
                    (`total_days_granted`, `created_at`, `updated_at`) 
                    VALUES ('$days', '" . now() . "', '" . now() . "')
                ");
            return redirect()->back()->with('error', 'Database already exists!');
        }

        //Update tenant status and days
        $tenant->update([
            'days' => $days,
            'status' => 'approved'
        ]);

        //Create the new database
        DB::statement("CREATE DATABASE `$newDb`");

        try {
            //Copy all tables from source DB (if exists)
            if (DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?", [$sourceDb])) {
                $tables = DB::select("SHOW TABLES FROM `$sourceDb`");
                $tableKey = 'Tables_in_' . strtolower($sourceDb);

                foreach ($tables as $table) {
                    $tableName = $table->$tableKey;
                    DB::statement("CREATE TABLE `$newDb`.`$tableName` LIKE `$sourceDb`.`$tableName`");
                    DB::statement("INSERT INTO `$newDb`.`$tableName` SELECT * FROM `$sourceDb`.`$tableName`");
                }
            }

            // Handle subscription table
            $subscriptionExists = DB::select("SHOW TABLES FROM `$newDb` LIKE 'subscription'");
            $expiresAt = now()->addDays($days);

            if (!empty($subscriptionExists)) {
                DB::statement("TRUNCATE TABLE `$newDb`.`subscription`");
            } else {
                // Create new subscription table
                DB::statement("
                CREATE TABLE `$newDb`.`subscription` (
                    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                    `total_days_granted` int NOT NULL,
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
            ");
            }
            // Insert initial record
            DB::statement("
                    INSERT INTO `$newDb`.`subscription` 
                    (`total_days_granted`, `created_at`, `updated_at`) 
                    VALUES ('$days', '" . now() . "', '" . now() . "')
                ");


            //  Send email with expiry info
            Mail::send('mailforclient', [
                'name' => $tenant->full_name,
                'username' => 'admin@gmail.com',
                'password' => '12345678',
                'slug' => $newDb,
                'expires_on' => $expiresAt->format('M d, Y'),
            ], function ($message) use ($tenant) {
                $message->to($tenant->email)
                    ->subject('Your ProjectSayogi Access Details');
            });

            return redirect()->back()->with(
                'success',
                "Tenant approved! Access expires on " . $expiresAt->format('M d, Y')
            );
        } catch (\Exception $e) {
            \Log::error("Tenant approval failed: " . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Operation failed. Error logged.');
        }
    }
    public function decline($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->status = "decline";
        $tenant->days = 0;
        $tenant->save();
        return redirect()->back()->with('success', 'Tenant declined successfully.');
    }
}
