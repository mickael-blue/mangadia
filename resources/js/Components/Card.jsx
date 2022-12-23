export default function Card({ character: { name, picture_path }, className }) {
    return (
        <div className={"rounded-xl overflow-hidden shadow-lg bg-slate-100 mx-4 "+ className}>
            <div className="max-w-sm flex flex-col h-full">
                <img className="w-full flex-1 object-cover" src={`/storage/` + picture_path} alt={name}/>
                <div className="px-6 py-4">
                    <div className="font-bold text-xl mb-2">{name}</div>
                </div>
            </div>
        </div>
    );
}
