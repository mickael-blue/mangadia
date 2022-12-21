import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, InertiaLink, usePage } from "@inertiajs/inertia-react";

export default function Index({ auth }) {
    const { mangas } = usePage().props;
    const { data } = mangas;
    console.log(mangas);
    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    Manga
                </h2>
            }
        >
            <Head title="Manga" />

            <div className="py-12">
                <InertiaLink
                    href={route("manga.create")}
                    className="flex items-center px-6 py-4 focus:text-indigo-700 focus:outline-none"
                >
                    Ajouter un manga
                </InertiaLink>
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    {data.map(({ id, title }) => {
                        return (
                            <div
                                key={id}
                                className="p-4 sm:p-8 bg-white shadow sm:rounded-lg"
                            >
                                <InertiaLink
                                    href={route("manga.edit", id)}
                                    className="flex items-center px-6 py-4 focus:text-indigo-700 focus:outline-none"
                                >
                                    {title}
                                </InertiaLink>
                            </div>
                        );
                    })}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
